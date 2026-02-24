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
}
