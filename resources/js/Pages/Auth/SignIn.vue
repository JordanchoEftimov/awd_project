<template>
    <div>
        <SignInComponent/>
    </div>
</template>

<script>
import AuthLayout from "../../Layouts/AuthLayout";
import SignInComponent from "../../Components/SignInComponent";

export default {
    name: "SignIn",
    components: {SignInComponent},
    layout: AuthLayout
}
</script>

<style scoped>

</style>
