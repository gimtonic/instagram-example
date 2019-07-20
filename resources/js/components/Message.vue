<template>
    <div>
        <p v-if="itemMutated.item_type === 'text'">{{ itemMutated.text }}</p>
        <p v-else-if="itemMutated.item_type === 'voice_media'">
            <audio :src="itemMutated.voice_media.media.audio.audio_src" controls></audio>
        </p>
        <p v-else-if="itemMutated.item_type === 'media'"
           v-for="img in itemMutated.media.image_versions2.candidates">
            <img :src="img.url">
        </p>
        <span class="time_date">{{ itemMutated.timestamp | dateShow }}</span>
    </div>
</template>

<script>
    export default {
        props: {
            item: Object
        },
        data: function () {
            return {
                itemMutated: this.item
            }
        }
    }
</script>

<style scoped>

</style>