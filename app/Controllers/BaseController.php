<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 *
 * Extend this class in any new controllers:
 * ```
 *     class Home extends BaseController
 * ```
 *
 * For security, be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */

    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Load here all helpers you want to be available in your controllers that extend BaseController.
        // Caution: Do not put the this below the parent::initController() call below.
        $this->helpers = ['form', 'url'];

        // Caution: Do not edit this line.
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.
        $this->session = \Config\Services::session();

        // Anti-Session Hijacking verification
        $agent = $request->getUserAgent()->getAgentString();
        $stored_agent = $this->session->get('Kaadaisoft_userAgent');

        // Note: CI4 native User-Agent matching is removed, implementing manual fail-safe
        if ($this->session->has('Kaadaisoft_userId')) {
            if ($stored_agent && $stored_agent !== $agent) {
                // Suspicious activity detected: User-Agent mismatch!
                $this->session->destroy();
                // We use header redirection and exit directly inside BaseController to prevent execution continuation.
                header("Location: " . base_url('/'));
                exit();
            } else if (!$stored_agent) {
                $this->session->set('Kaadaisoft_userAgent', $agent);
            }
        }
    }

    /**
     * Send email using Resend API
     */
    protected function sendResendEmail($to, $subject, $htmlMessage) {
        $apiKey = env('RESEND_API_KEY');
        if (empty($apiKey)) {
            log_message('error', 'RESEND_API_KEY is not set in .env');
            return false;
        }

        $fromEmail = env('email.fromEmail') ?: 'support@mail.kaadaikulam.org';
        $fromName  = env('email.fromName') ?: 'Poondurai Kaadai Kulam';

        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://api.resend.com/emails');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
                'from'    => $fromName . ' <' . $fromEmail . '>',
                'to'      => [$to],
                'subject' => $subject,
                'html'    => $htmlMessage
            ]));
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Authorization: Bearer ' . $apiKey,
                'Content-Type: application/json'
            ]);
            
            // Critical settings to prevent 20-30s delays on live servers
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4); // Force IPv4 to prevent IPv6 timeout delays

            $result = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $curlError = curl_error($ch);
            curl_close($ch);

            if ($result === false) {
                log_message('error', 'Resend cURL Error: ' . $curlError);
                return false;
            }

            if ($httpCode >= 200 && $httpCode < 300) {
                return true;
            }
            log_message('error', 'Resend API Error (HTTP ' . $httpCode . '): ' . $result);
            return false;
        } catch (\Exception $e) {
            log_message('error', 'Resend Exception: ' . $e->getMessage());
            return false;
        }
    }
}
