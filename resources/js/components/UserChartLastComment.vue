<template>
    <div class="chat_list active_chat">
        <div class="chat_people">
            <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
            <div class="chat_ib" v-for="user in threadMutated.users">
                <h5>{{ user.full_name }} <span class="chat_date">{{ threadMutated.items[0].timestamp }}Dec 25</span></h5>
                <p>{{ threadMutated.items[0].text }}</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            thread: Object,
        },
        data: function () {
            return {
                threadMutated: this.thread,
            }
        },
    }
</script>

<style scoped>

</style>