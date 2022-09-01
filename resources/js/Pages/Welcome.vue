<template>
    <div class="nav-bar flex items-center h-[50px]" style="justify-content: space-between" >
        <h2 class="ml-[20px] text-white" style="line-height: 50px;font-size: 1.3em" >{{ "Telementary Application" }}</h2>
        <div class="linker">
            <ul class="flex align-middle text-white">
                <li class="linker mx-[10px]">
                    <Link>Services</Link>
                </li>
                <li class="linker mx-[10px]">
                    <Link>Practitioners</Link>
                </li>
            </ul>
        </div>
        <div class="user-details mr-[20px]">
            <Link as="button"  :href="route('dashboard')"  class="app-btn rounded mx-[10px]" v-if="$attrs.user != null">Dashboard</Link>
            <button class="app-btn rounded" v-if="$attrs.user != null" @click="logout"> Log Out</button>
        </div>
    </div>
    <div  class="main-content-display">
        <div v-if="$attrs.user == null" class="sign-in-form">
            <h1>Sign In</h1>
            <form   @submit="submit" action="" autocomplete="off">

                <div class="mb-6">
                    <!--                        <label for="exampleInputEmail1" class="form-label">Email address</label>-->
                    <input
                        placeholder="username"
                        type="email"
                        v-model="form.email"
                        class="form-control rounded"
                        id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                    <div v-if="$attrs.errors && $attrs.errors.email" id="emailHelp" class="form-text">{{ $attrs.errors.email }}</div>
                </div>

                <div class="mb-6">
                    <!--                        <label for="exampleInputPassword1" class="form-label">Password</label>-->
                    <input
                        placeholder="email"
                        type="password"
                        v-model="form.password"
                        class="form-control rounded"
                        id="exampleInputPassword1">
                </div>

            </form>
            <div class="button-section">
                <button class="button-fill" @click.prevent="submit" >Sign In</button>
                <Link>Forgot password</Link>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    data() {
        return {
            form : this.$inertia.form({
                email: '',
                password: '',
                remember: false,
            })
        }
    },
    methods: {
        submit() {
            this.form.post(route('login'), {
                onFinish: () => this.form.reset('password'),
            });
        },
        async logout() {
            const req = axios.post(route('logout'))

            if (req instanceof Promise) {
                const res = await req
            }

            return req.then(res => {
                window.location.reload()
            })

        }
    }
}
</script>

<style lang="scss" scoped>
.nav-bar{
    background-color: var(--primarry-color-blue);

}


.main-content-display {
    width: 100%;
    height: calc(100vh - 50px);
    background-image: url("./storage/SystemFiles/images/banner.jpg");
    background-position: center;
    background-size: cover;
    display: flex;
    justify-content: flex-end;
    padding-right: 100px;
    padding-top: 100px;

    .sign-in-form {
        width: 380px;
        height: fit-content;
        background-color: white;
        border-radius: 5px;
        box-shadow: 0 0 6px grey;
        padding: 20px;
        padding-bottom: 50px;

        h1 {
            text-decoration: underline;
            font-size: 1.5em;
            padding-bottom: 40px;
        }

        form{
            width: 90%;
            .input-group{
            }
        }

        .button-section{
            width: 100%;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: space-between;

            button{
                padding: 10px 20px;
            }
        }
    }
}
</style>
