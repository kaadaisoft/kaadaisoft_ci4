<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\ResponseInterface;

class DocumentController extends BaseController
{
    public function view($filename)
    {
        // 1. Authentication Check
        // Based on the application's existing patterns, we check for 'Kaadaisoft_userId' in session
        if (!session()->has('Kaadaisoft_userId')) {
            // If the user is not logged in, we could redirect or return a 403.
            // For images, a 403 or 404 is often better than a redirect to a login page HTML.
            return $this->response->setStatusCode(403, 'Unauthorized');
        }

        // 2. Path Resolution
        $path = WRITEPATH . 'uploads/membersdocuments/' . $filename;

        // 3. Security: Check for path traversal attempts
        $realpath = realpath($path);
        $expectedPath = realpath(WRITEPATH . 'uploads/membersdocuments/');
        
        if ($realpath === false || strpos($realpath, $expectedPath) !== 0) {
             return $this->response->setStatusCode(404, 'File Not Found');
        }

        if (!file_exists($path)) {
            return $this->response->setStatusCode(404, 'File Not Found');
        }

        // 4. Serve File
        $file = new \CodeIgniter\Files\File($path);
        $mimeType = $file->getMimeType();

        return $this->response
            ->setHeader('Content-Type', $mimeType)
            ->setBody(file_get_contents($path));
    }
}
