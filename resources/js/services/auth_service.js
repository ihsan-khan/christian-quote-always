import store from '../store';
import { http, httpFile } from './http_service';
const jwt = require("jsonwebtoken");

export function register(user) {
    return http().post('/auth/register', user);
}

export function registerWithGoogle(user) {
    return http().post('/auth/register-by-google', user)
    .then(res => {
        if (res.status === 200) {
            setToken(res.data);
        }
        return res;
    });
}

export function login(user) {
    return http().post('/auth/login', user)
    .then(res => {
        if (res.status === 200) {
            setToken(res.data);
        }
        return res;
    });
}

function setToken(data) {
    const token = generateJWT(data);
    localStorage.setItem('cq-devby-softgear2019', token);
    store.dispatch('authenticate', data.user);
}

function generateJWT(data) {
    return jwt.sign({user: data}, 'cq27f4fc3d7755961ce9com4ab143c86d324bf294178combysoftgear2020');
}

export function isLoggedIn() {
    const token = localStorage.getItem('cq-devby-softgear2019');
    return token != null;
}

function decodeToken() {
    const token = getToken();
    if (!token) {
        return null;
    }
    return jwt.decode(token);
}

export function getUserProfile() {
    const token = decodeToken();
    if (!token) {
        return null;
    }

    return token.user.user;
}

export function getUserRole() {
    const token = decodeToken();
    if (!token) {
        return null;
    }

    return token.user.user.role;
}

export function isVerified() {
    const token = decodeToken();
    if (!token) {
        return null;
    }

    return token.user.user.email_verified_at;
}

function getToken() {
    return localStorage.getItem('cq-devby-softgear2019');
}

export function getProfile() {
    return http().get('/auth/profile');
}

export function getAccessToken() {
    const token = decodeToken();
    if (!token) {
        return null;
    }
    return token.user.access_token;
}

export function logout() {
    http().get('/auth/logout');
    localStorage.removeItem('cq-devby-softgear2019');
    store.dispatch('authenticate');
}

export function changePassword(password) {
    return http().post('/change-password', password);
}

export function updateProfile(profile) {
    return http().post('/update-profile', profile);
}

export function resetPasswordRequest(request) {
    return http().post('/auth/reset-password-request', request);
}

export function resetPassword(request) {
    return http().post('/auth/reset-password', request);
}

export function resendCode() {
    return http().get('/auth/resend-code');
}

export function checkVerificationCode(verificationCode) {
    return http().post('/auth/check-verification-code', verificationCode);
}
