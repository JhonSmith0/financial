export class TokenService {
    public saveAccessToken(token: string) {
        localStorage.setItem('access_token', token);
        return this;
    }
    public saveRefreshToken(token: string) {
        localStorage.setItem('refresh_token', token);
        return this;
    }
    public getAccessToken(): string | null {
        return localStorage.getItem('access_token');

    }
    public getRefreshToken(): string | null {
        return localStorage.getItem('refresh_token');
    }
}
