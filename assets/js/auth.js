// Base URL configuration
const BASE_URL = window.location.origin + '/solisgreenindia_Login/';
const API_URL = BASE_URL + 'backend/api/';

class Auth {
    constructor() {
        this.init();
    }
    
    init() {
        this.setupLoginForm();
        this.checkRememberedUser();
    }
    
    setupLoginForm() {
        const loginForm = document.getElementById('loginForm');
        if (loginForm) {
            loginForm.addEventListener('submit', (e) => {
                e.preventDefault();
                this.handleLogin();
            });
        }
    }
    
    async handleLogin() {
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const remember = document.getElementById('remember').checked;
        
        const loginBtn = document.querySelector('.login-btn');
        loginBtn.textContent = '🔐 Authenticating...';
        loginBtn.disabled = true;
        
        try {
            const response = await fetch(API_URL + 'auth.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    action: 'login',
                    email: email,
                    password: password,
                    remember: remember
                })
            });
            
            const result = await response.json();
            
            if (result.success) {
                this.showMessage('✅ Login successful! Redirecting...', 'success');
                setTimeout(() => {
                    window.location.href = BASE_URL + 'pages/dashboard.php';
                }, 1000);
            } else {
                this.showMessage('❌ ' + result.message, 'error');
                loginBtn.textContent = '🚀 Access Dashboard';
                loginBtn.disabled = false;
            }
        } catch (error) {
            this.showMessage('❌ Network error. Please try again.', 'error');
            loginBtn.textContent = '🚀 Access Dashboard';
            loginBtn.disabled = false;
        }
    }
    
    showMessage(message, type) {
        const errorDiv = document.getElementById('errorMessage');
        errorDiv.textContent = message;
        errorDiv.className = `message ${type}`;
        errorDiv.style.display = 'block';
        
        setTimeout(() => {
            errorDiv.style.display = 'none';
        }, 5000);
    }
}

// Initialize auth when page loads
document.addEventListener('DOMContentLoaded', () => {
    new Auth();
});
