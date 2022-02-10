<template>
    <div>
        <SignUpComponent/>
    </div>
</template>

<script>
import SignUpComponent from "../../Components/SignUpComponent";
import AuthLayout from "../../Layouts/AuthLayout";

export default {
    name: "SignUp",
    components: {SignUpComponent},
    layout: AuthLayout
}
</script>

<style scoped>

</style>
