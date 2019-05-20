<template>
    <div>
        <div class="outgoing_msg" v-if="currentUserPkMutated === Number(itemMutated.user_id)">
            <div class="sent_msg">
                <p v-if="itemMutated.item_type === 'text'">{{ itemMutated.text }}</p>
                <p v-else-if="itemMutated.item_type === 'voice_media'">
                    <audio :src="itemMutated.voice_media.media.audio.audio_src" controls></audio>
                </p>
                <p v-else-if="itemMutated.item_type === 'media'" v-for="img in itemMutated.media.image_versions2.candidates">
                    <img :src="img.url">
                </p>
                <span class="time_date">{{ itemMutated.timestamp | dateShow }}</span>
            </div>
        </div>
        <div class="incoming_msg" v-else>
            <div class="incoming_msg_img"> <img :src="answerUserMutated.profile_pic_url" alt="sunil"> </div>
            <div class="received_msg">
                <div class="received_withd_msg">
                    <p v-if="itemMutated.item_type === 'text'">{{ itemMutated.text }}</p>
                    <p v-else-if="itemMutated.item_type === 'voice_media'">
                        <audio :src="itemMutated.voice_media.media.audio.audio_src" controls></audio>
                    </p>
                    <p v-else-if="itemMutated.item_type === 'media'" v-for="img in itemMutated.media.image_versions2.candidates">
                        <img :src="img.url">
                    </p>
                    <span class="time_date">{{ itemMutated.timestamp | dateShow }}</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            item: Object,
            currentUserPk: Number,
            answerUser: Object,
        },
        data: function () {
            return {
                itemMutated: this.item,
                currentUserPkMutated: this.currentUserPk,
                answerUserMutated: this.answerUser,
            }
        }
    }
</script>

<style scoped>

</style>