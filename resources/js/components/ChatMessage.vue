<template>
    <div>
        <div class="outgoing_msg" v-if="currentUserPkMutated === Number(itemMutated.user_id)">
            <div class="sent_msg">
                <message :item="item"></message>
            </div>
        </div>
        <div class="incoming_msg" v-else>
            <div class="incoming_msg_img"> <img :src="answerUserMutated.profile_pic_url" alt="sunil"> </div>
            <div class="received_msg">
                <div class="received_withd_msg">
                    <message :item="item"></message>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Message from './Message';

    export default {
        components: {
          Message
        },
        props: {
            item: Object,
            currentUserPk: Number,
            answerUser: Object,
        },
        data: function () {
            return {
                currentUserPkMutated: this.currentUserPk,
                answerUserMutated: this.answerUser,
                itemMutated: this.item
            }
        }
    }
</script>

<style scoped>

</style>