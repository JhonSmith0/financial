import { AuthService } from "./AuthService";
import { TokenService } from "./TokenService";
import { api } from "./api";

export const tokenService = new TokenService()
export const authService = new AuthService(api, tokenService)
