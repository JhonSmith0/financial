import type { IUser } from "@/types";
import type { Axios } from "axios";
import type { TokenService } from "./TokenService";

export namespace AuthService {
    export namespace Params {
        export interface Login {
            email: string;
            password: string;
        }
        export interface Register extends Login {
            name: string;
        }
    }
    export namespace Response {
        export interface Login {
            user: IUser;
            refresh_token: string;
            access_token: string;
        }
        export interface Register extends Login {
        }
        export interface Me extends IUser {
        }
    }
}

export class AuthService {
    constructor(
        private api: Axios,
        private tokenService: TokenService,
    ) {

    }

    public async login(params: AuthService.Params.Login): Promise<AuthService.Response.Login> {
        const result = await this.api.post<AuthService.Response.Login>('/auth/login', params);

        this.tokenService.saveAccessToken(result.data.access_token)
        this.tokenService.saveRefreshToken(result.data.refresh_token)

        return result.data;
    }
    public async register(params: AuthService.Params.Register): Promise<AuthService.Response.Register> {
        const result = await this.api.post<AuthService.Response.Register>('/auth/register', params);

        this.tokenService.saveAccessToken(result.data.access_token)
        this.tokenService.saveRefreshToken(result.data.refresh_token)

        return result.data;
    }

    public async me(): Promise<AuthService.Response.Me> {
        const result = await this.api.post<AuthService.Response.Me>('/auth/me')
        return result.data;
    }
}
