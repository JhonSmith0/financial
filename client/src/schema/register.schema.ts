import { object, string } from "yup";

export const registerSchema = object({
    name: string().min(8).max(64).required(),
    email: string().email().required(),
    password: string().min(8).max(128).required()
})
