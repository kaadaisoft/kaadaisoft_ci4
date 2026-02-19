<?php
/**
 * Shared Notification Toast - Include this in all pages
 * Usage: <?= view('notification_toast') ?>
 *
 * Handles all session-based success/error notifications with a unified design.
 * Auto-close is DISABLED - user must click X to close.
 */

// Collect all possible session notification keys
$successKeys = [
    'managersuccessstatus',
    'coordsuccessstatus',
    'membersuccessstatus',
    'eventsuccessstatus',
    'assigncoordsuccessstatus',
    'approvedsuccess',
    'rejectedsuccess',
    'paymentsuccessstatus',
    'registerprocesssuccess',
    'password_success',
    'upload_success',
];

$errorKeys = [
    'managererrorstatus',
    'coorderrorstatus',
    'membererrorstatus',
    'eventerrorstatus',
    'assigncoorderrorstatus',
    'applicationerrorstatus',
    'registerprocesserror',
    'approvederror',
    'updateerror',
    'password_error',
    'upload_error',
];

$successMsg = null;
$errorMsg   = null;

foreach ($successKeys as $key) {
    if (!empty($_SESSION[$key])) {
        $successMsg = $_SESSION[$key];
        unset($_SESSION[$key]);
        break;
    }
}

foreach ($errorKeys as $key) {
    if (!empty($_SESSION[$key])) {
        $errorMsg = $_SESSION[$key];
        unset($_SESSION[$key]);
        break;
    }
}
?>

<!-- ===== UNIFIED MUI NOTIFICATION ALERT ===== -->
<style>
    .ps-mui-alert-container {
        position: fixed;
        top: 24px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 999999;
        width: 100%;
        max-width: 500px;
        padding: 0 20px;
        pointer-events: none;
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .ps-mui-alert {
        display: flex;
        align-items: center;
        padding: 14px 18px;
        border-radius: 4px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        pointer-events: auto;
        animation: psMuiSlideIn 0.4s ease-out;
        transition: opacity 0.3s ease, transform 0.3s ease, margin 0.3s ease;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    }

    @keyframes psMuiSlideIn {
        from { transform: translateY(-20px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    .ps-mui-alert-icon {
        margin-right: 14px;
        font-size: 24px;
        display: flex;
        align-items: center;
        flex-shrink: 0;
    }

    .ps-mui-alert-content {
        flex-grow: 1;
        min-width: 0;
    }

    .ps-mui-alert-title {
        font-weight: 700;
        margin-bottom: 2px;
        font-size: 1rem;
        line-height: 1.2;
    }

    .ps-mui-alert-msg {
        font-size: 0.9rem;
        font-weight: 500;
        word-break: break-word;
        line-height: 1.4;
    }

    .ps-mui-alert-close {
        margin-left: 12px;
        cursor: pointer;
        font-size: 22px;
        padding: 4px 8px;
        line-height: 1;
        opacity: 0.6;
        transition: all 0.2s;
        background: transparent;
        border: none;
        color: inherit;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .ps-mui-alert-close:hover {
        opacity: 1;
        background: rgba(0, 0, 0, 0.05);
        border-radius: 50%;
    }

    /* MUI Variants */
    .ps-mui-alert-success {
        background-color: #edf7ed;
        color: #1e4620;
        border: 1px solid #c3e6cb;
    }
    .ps-mui-alert-error {
        background-color: #fdeded;
        color: #5f2120;
        border: 1px solid #f5c6cb;
    }
    .ps-mui-alert-warning {
        background-color: #fff4e5;
        color: #663c00;
        border: 1px solid #ffeeba;
    }
    .ps-mui-alert-info {
        background-color: #e5f6fd;
        color: #014361;
        border: 1px solid #bee5eb;
    }

    @media (max-width: 576px) {
        .ps-mui-alert-container {
            top: 12px;
            padding: 0 12px;
        }
        .ps-mui-alert {
            padding: 10px 14px;
        }
    }
</style>

<div id="ps-mui-alert-container" class="ps-mui-alert-container"></div>

<script>
/**
 * Global function to show MUI Alert
 * @param {string} type - success, error, warning, info
 * @param {string} message - The message body
 * @param {string} titleOverride - Optional custom title
 */
function psShowToast(type, message, titleOverride = null) {
    const container = document.getElementById('ps-mui-alert-container');
    const alert = document.createElement('div');
    
    // Normalize type
    if (type === 'danger') type = 'error';
    if (!['success', 'error', 'warning', 'info'].includes(type)) type = 'info';
    
    alert.className = `ps-mui-alert ps-mui-alert-${type}`;
    
    let icon = '';
    let defaultTitle = '';
    
    if (type === 'success') {
        icon = '<i class="fa-solid fa-circle-check"></i>';
        defaultTitle = 'Success';
    } else if (type === 'error') {
        icon = '<i class="fa-solid fa-circle-xmark"></i>';
        defaultTitle = 'Error';
    } else if (type === 'warning') {
        icon = '<i class="fa-solid fa-triangle-exclamation"></i>';
        defaultTitle = 'Warning';
    } else {
        icon = '<i class="fa-solid fa-circle-info"></i>';
        defaultTitle = 'Information';
    }

    const title = titleOverride || defaultTitle;

    alert.innerHTML = `
        <div class="ps-mui-alert-icon">${icon}</div>
        <div class="ps-mui-alert-content">
            <div class="ps-mui-alert-title">${title}</div>
            <div class="ps-mui-alert-msg">${message}</div>
        </div>
        <button class="ps-mui-alert-close" onclick="psHideToast(this.parentElement)">&times;</button>
    `;

    container.appendChild(alert);

    // Auto-remove after 6 seconds for cleaner UI (but user can close manually)
    setTimeout(() => {
        if (alert.parentElement) {
            psHideToast(alert);
        }
    }, 6000);
}

function psHideToast(alertElement) {
    if (!alertElement) return;
    alertElement.style.opacity = '0';
    alertElement.style.transform = 'translateY(-10px)';
    setTimeout(() => {
        if (alertElement.parentElement) {
            alertElement.remove();
        }
    }, 300);
}

// Auto-trigger from PHP session
<?php if ($successMsg): ?>
document.addEventListener('DOMContentLoaded', function() {
    psShowToast('success', <?= json_encode(htmlspecialchars_decode($successMsg)) ?>);
});
<?php elseif ($errorMsg): ?>
document.addEventListener('DOMContentLoaded', function() {
    psShowToast('error', <?= json_encode(htmlspecialchars_decode($errorMsg)) ?>);
});
<?php endif; ?>
</script>
<!-- ===== UNIFIED MUI NOTIFICATION ALERT END ===== -->
