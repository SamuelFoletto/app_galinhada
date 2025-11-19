<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="/login" @submit.prevent="login">
                            <input type="hidden" name="_token" :value="token_csrf">

                            <div class="row mb-3">
                                <img :src="logo" class="w-25 mx-auto rounded-5">
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-3 col-form-label text-md-end">E-mail</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email"
                                           v-model="email" required autocomplete="email" autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-3 col-form-label text-md-end">Senha</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password"
                                           v-model="password" required autocomplete="current-password">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                        <label class="form-check-label" for="remember">
                                            Mantenha-me conectado
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8 offset-md-5">
                                    <button type="submit" class="btn btn-warning btn-lg">
                                        Login
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["token_csrf"],

    data() {
        return {
            email: "",
            password: "",
            logo: "/images/logo_gib.jpg"
        };
    },

    methods: {
        login() {
            const formData = new URLSearchParams();
            formData.append("email", this.email);
            formData.append("password", this.password);
            formData.append("_token", this.token_csrf);

            fetch("/login", {
                method: "POST",
                credentials: "same-origin",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                    "X-CSRF-TOKEN": this.token_csrf
                },
                body: formData
            })
                .then(response => {
                    if (response.redirected) {
                        window.location.href = response.url;
                    }
                    return response;
                })
                .catch(() => alert("Erro ao realizar login"));
        }
    }
};
</script>
