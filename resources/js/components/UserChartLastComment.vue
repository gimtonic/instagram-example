<template>
        <div class="chat_list"
             @mouseover="isHovering = true"
             @mouseout="isHovering = false"
             :class="{active_chat: isHovering}">
            <div class="chat_people" v-for="user in threadMutated.users" @click="showMessages(user)">
                <div class="chat_img"> <img :src="user.profile_pic_url" alt="sunil"> </div>
                <div class="chat_ib">
                    <h5>{{ user.full_name }} <span class="chat_date">{{ threadMutated.items[0].timestamp | dateIndex }}</span></h5>
                    <p v-if="threadMutated.items[0].item_type === 'text'">{{ threadMutated.items[0].text }}</p>
                    <p v-else="threadMutated.items[0].item_type === 'media'">Картинка...</p>
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
                isPicture: false,
                isHovering: false,
            }
        },
        methods: {
            /**
             * Переходим на страницу show для просмотра всех сообщений пользователя
             * @param user
             */
            showMessages(user) {
                window.location.href = '/home/' + user.pk;
            }
        }
    }
</script>

<style scoped>

</style>