import { http, httpFile } from './http_service';

export function createQuote(quoteData) {
    return http().post('/quote/store', quoteData);
}

export function uploadQuote(quote) {
    return httpFile().post('/upload-quote', quote);
}

export function getAllQuotes() {
    return http().get('/get-all-quotes'); 
}

export function orderByText() {
    return http().get('/order-by-text');
}

export function orderByImage() {
    return http().get('/order-by-image');
}

export function orderByAuthor() {
    return http().get('/order-by-author');
}



export function getUserFavorited() {
    return http().get('/get-user-favorited');
}

export function favourite(data) {
    return http().post('/favourite', data);
}
export function unFavourite(data) {
    return http().post('/un-favourite', data);
}
export function like() {
    return http().get('/like');
}
export function getQuotes() {
    return http().get('/get-quotes');
}
export function updateQuoteText(id , data) {
    return http().post(`update-quote/${id}`, data);
}
export function updateUploadQuote(id,data) {
    return httpFile().post(`update-quote/${id}`, data);
}
export function deleteQuote(id) {
    return http().post(`delete-quote/${id}`);
}

export function deleteFavorite(data) {
    return http().delete(`delete-favorite/${data.id}`);
}

export function permission(id) {
    return http().post(`permission/${id}`);
}
export function decline(id){
    return http().post(`decline/${id}`);
}
export function getText(nextpage){
    return http().get(`/get-all-quotes?page=${nextpage}`);
}
export function getImage(nextpage) {
    return http().get(`/order-by-image?page=${nextpage}`);
}
export function getAuthor(nextpage) {
    return http().get(`/order-by-author?page=${nextpage}`);
}
// export function autoComplete(request) {
//     return http().get('/auto_complete',request);
// }
export function searchQuote(request) {
    return http().post(`/search`, request);
}

