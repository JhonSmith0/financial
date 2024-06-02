import { object, string } from "yup";

export const loginSchema = object({
    email: string().email().required(),
    password: string().min(8).max(128).required()
})
