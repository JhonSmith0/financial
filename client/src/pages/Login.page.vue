<script lang="ts" setup>
import Button from '@/components/Button/Button.vue';
import { loginSchema } from '@/schema/login.schema';
import { authService } from '@/services/services';
import { user } from '@/state/user';
import { useForm } from 'vee-validate';
import { ref } from 'vue';
import { RouterLink, useRouter } from 'vue-router';
import type { InferType } from 'yup';

const router = useRouter()

const form = useForm<InferType<typeof loginSchema>>({
    validationSchema: loginSchema
})

const errors = form.errors

const [email, emailAttrs] = form.defineField('email');
const [password, passwordAttrs] = form.defineField('password');

const loading = ref(false);

const onSubmit = form.handleSubmit(async function (values) {
    if (loading.value) return;
    loading.value = true;
    try {
        const result = await authService.login(values);
        user.value = result.user;
        form.resetForm();
        router.push('/')
    } catch (error: any) {
        alert(error?.response.data.message)

    }
    loading.value = false;
})

</script>
<template>
    <div class="fixed top-0 left-0 right-0 bottom-0">
        <img class="object-cover w-full h-full"
            src="https://images.unsplash.com/photo-1501785888041-af3ef285b470?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" />
    </div>
    <div class="flex h-screen relative  ml-auto shrink-0 max-w-[60rem] flex-1">
        <form @submit="onSubmit" class="p-[4rem] w-full border items-start bg-[#f8f9fa] content-start ml-auto">
            <h2 class="mt-[8rem]  mb-[4rem] text-[3.8rem] font-poppins text-center">
                <span>Login</span>
            </h2>
            <div class="grid gap-[2rem]">
                <fieldset :disabled="loading" class="grid gap-[1rem]">
                    <label class="font-poppins font-light text-[2.4rem]">E-mail</label>
                    <div class="border-black rounded-[0.5rem] overflow-hidden border-opacity-10 border">
                        <input v-model="email" v-bind="emailAttrs" class="p-[2rem] w-full font-inter" type="email"
                            placeholder="johnsmith@email.com" />
                    </div>
                    <div class="text-right">{{ errors.email }}</div>
                </fieldset>
                <fieldset :disabled="loading" class="grid gap-[1rem]">
                    <label class="font-poppins font-light text-[2.4rem]">Password</label>
                    <div class="border-black rounded-[0.5rem] overflow-hidden border-opacity-10 border">
                        <input v-model="password" v-bind="passwordAttrs" class="p-[2rem] w-full font-inter"
                            type="password" placeholder="********" />
                    </div>
                    <div class="text-right">{{ errors.password }}</div>
                </fieldset>
            </div>

            <div class="flex mt-[6rem] gap-[1rem]">
                <a class="w-full">
                    <Button :disabled="loading" type="submit" variant="blue" class="w-full">
                        Logar
                    </Button>
                </a>
                <RouterLink to="/register" class="w-full">
                    <Button :disabled="loading" variant="ghost" class="w-full">
                        Registrar
                    </Button>
                </RouterLink>
            </div>
        </form>
    </div>

</template>
