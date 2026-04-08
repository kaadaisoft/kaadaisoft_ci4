<?php
/**
 * Shared Notification system - Include this in all pages
 * Usage: <?= view('notification_toast') ?>
 *
 * Handles all session-based and JavaScript-triggered notifications with a 
 * unified premium centered modal design.
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
    'success',
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
    'validationmessage',
    'error',
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

<style>
    /* Small Simple Alert Modal Styles */
    .success-gradient { background: linear-gradient(135deg, #66bb6a 0%, #43a047 100%); }
    .error-gradient { background: linear-gradient(135deg, #ef5350 0%, #e53935 100%); }
    .warning-gradient { background: linear-gradient(135deg, #ffa726 0%, #fb8c00 100%); }
    .info-gradient { background: linear-gradient(135deg, #29b6f6 0%, #039be5 100%); }
</style>

<!-- Unified App Notification (Small Alert Modal) -->
<div id="smallAlertModal" class="modal fade" tabindex="-1" aria-hidden="true" style="z-index: 9999999;">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 16px; background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(8px);">
            <div class="modal-body p-4 text-center">
                <div id="small-alert-icon-wrapper" class="mb-3 d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 50px; height: 50px;">
                    <i id="small-alert-icon" class="fa-solid" style="font-size: 1.5rem; color: white;"></i>
                </div>
                <h6 id="small-alert-title" class="fw-bold mb-2 text-dark"></h6>
                <p id="small-alert-message" class="text-muted mb-3" style="font-size: 0.85rem; font-weight: 500;"></p>
                <button type="button" class="btn btn-sm btn-dark w-100 py-2" data-bs-dismiss="modal" data-dismiss="modal" onclick="psCloseStandardModal()" style="border-radius: 8px;">
                    OK
                </button>

            </div>
        </div>
    </div>
</div>

<script>
/**
 * Unified notification function - shows a premium centered popup
 * @param {string} type - success, error, warning, info
 * @param {string} message - The message body
 * @param {string} titleOverride - Optional custom title
 */
function psShowToast(type, message, titleOverride = null) {
    // Standardize default titles
    let defaultTitle = 'Information';
    if (type === 'success' || type === 'coordsuccessstatus') defaultTitle = 'Success';
    else if (type === 'error' || type === 'danger') defaultTitle = 'Error';
    else if (type === 'warning') defaultTitle = 'Warning';

    // Direct to the standardized Alert popup
    psShowAlert(type, titleOverride || defaultTitle, message);
}

/**
 * Global function to show a centered Small Alert Popup
 * @param {string} type - success, error, warning, info
 * @param {string} title - The alert title
 * @param {string} message - The message body
 */
function psShowAlert(type, title, message) {
    const iconWrapper = document.getElementById('small-alert-icon-wrapper');
    const icon = document.getElementById('small-alert-icon');
    const titleEl = document.getElementById('small-alert-title');
    const msg = document.getElementById('small-alert-message');

    if (!iconWrapper || !icon || !titleEl || !msg) return;

    // Reset classes
    iconWrapper.className = 'mb-3 d-inline-flex align-items-center justify-content-center rounded-circle';

    if (type === 'success') {
        iconWrapper.classList.add('success-gradient');
        icon.className = 'fa-solid fa-check';
    } else if (type === 'warning') {
        iconWrapper.classList.add('warning-gradient');
        icon.className = 'fa-solid fa-triangle-exclamation';
    } else if (type === 'info') {
        iconWrapper.classList.add('info-gradient');
        icon.className = 'fa-solid fa-circle-info';
    } else {
        iconWrapper.classList.add('error-gradient');
        icon.className = 'fa-solid fa-circle-xmark';
    }

    titleEl.innerText = title;
    msg.innerHTML = message;

    const modalEl = document.getElementById('smallAlertModal');
    
    // Bootstrap 5 Logic
    if (window.bootstrap && window.bootstrap.Modal) {
        const alertModal = new bootstrap.Modal(modalEl);
        alertModal.show();
    } 
    // Bootstrap 4 Logic (jQuery fallback)
    else if (window.jQuery && jQuery.fn.modal) {
        jQuery(modalEl).modal('show');
    }
}

/**
 * Robust modal closer for cross-version compatibility
 */
function psCloseStandardModal() {
    const modalEl = document.getElementById('smallAlertModal');
    if (window.bootstrap && window.bootstrap.Modal) {
        const modalInstance = bootstrap.Modal.getInstance(modalEl);
        if (modalInstance) modalInstance.hide();
    } else if (window.jQuery && jQuery.fn.modal) {
        jQuery(modalEl).modal('hide');
    }
}


function psHideToast(alertElement) {
    if (!alertElement) return;
    alertElement.remove();
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

/**
 * Global custom confirmation dialog — replaces browser confirm()
 * @param {string} message   - Question to show the user
 * @param {function} onConfirm - Callback executed when user clicks Confirm
 * @param {string} [confirmLabel] - Optional label for confirm button (default: 'Confirm')
 * @param {string} [type]        - 'danger' | 'warning' | 'success' (default: 'danger')
 */
function psConfirm(message, onConfirm, confirmLabel = 'Confirm', type = 'danger') {
    const existing = document.getElementById('ps-confirm-overlay');
    if (existing) existing.remove();

    const colorMap = {
        danger:  { bg: '#dc2626', icon: '<i class="fa-solid fa-triangle-exclamation"></i>', light: '#fef2f2' },
        warning: { bg: '#d97706', icon: '<i class="fa-solid fa-triangle-exclamation"></i>', light: '#fffbeb' },
        success: { bg: '#16a34a', icon: '<i class="fa-solid fa-circle-check"></i>',         light: '#f0fdf4' },
    };
    const c = colorMap[type] || colorMap.danger;

    const overlay = document.createElement('div');
    overlay.id = 'ps-confirm-overlay';
    overlay.style.cssText = `
        position: fixed; inset: 0; z-index: 9999999;
        background: rgba(15,23,42,0.55); backdrop-filter: blur(3px);
        display: flex; align-items: center; justify-content: center;
        animation: psFadeIn 0.2s ease;
    `;

    overlay.innerHTML = `
        <div style="
            background: #fff; border-radius: 16px; padding: 32px 28px 24px;
            max-width: 400px; width: 90%; box-shadow: 0 25px 50px -12px rgba(0,0,0,0.35);
            animation: psSlideUp 0.25s ease; text-align: center; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            position: relative;
        ">
            <div style="
                width: 60px; height: 60px; border-radius: 50%;
                background: ${c.light}; display: flex; align-items: center;
                justify-content: center; margin: 0 auto 16px; font-size: 26px; color: ${c.bg};
            ">${c.icon}</div>
            <p style="font-size: 1rem; font-weight: 500; color: #334155; margin: 0 0 24px; line-height: 1.6;">${message}</p>
            <div style="display: flex; gap: 12px; justify-content: center;">
                <button id="ps-confirm-cancel" style="
                    flex: 1; padding: 10px 0; border: 1px solid #e2e8f0; border-radius: 10px;
                    background: #f8fafc; color: #64748b; font-size: 0.95rem; font-weight: 600;
                    cursor: pointer; transition: all 0.2s;
                " onmouseover="this.style.background='#e2e8f0'" onmouseout="this.style.background='#f8fafc'">Cancel</button>
                <button id="ps-confirm-ok" style="
                    flex: 1; padding: 10px 0; border: none; border-radius: 10px;
                    background: ${c.bg}; color: #fff; font-size: 0.95rem; font-weight: 600;
                    cursor: pointer; transition: all 0.2s; box-shadow: 0 4px 6px rgba(0,0,0,0.15);
                " onmouseover="this.style.filter='brightness(1.1)'" onmouseout="this.style.filter='none'">${confirmLabel}</button>
            </div>
        </div>
    `;

    document.body.appendChild(overlay);

    document.getElementById('ps-confirm-cancel').onclick = () => overlay.remove();
    document.getElementById('ps-confirm-ok').onclick = () => {
        overlay.remove();
        if (typeof onConfirm === 'function') onConfirm();
    };

    // Close on backdrop click
    overlay.addEventListener('click', (e) => { if (e.target === overlay) overlay.remove(); });
}
</script>

<style>
@keyframes psFadeIn  { from { opacity: 0; } to { opacity: 1; } }
@keyframes psSlideUp { from { transform: translateY(20px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
</style>
