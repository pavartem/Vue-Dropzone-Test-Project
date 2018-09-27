<template>
    <div>
        <vue-dropzone ref="myVueDropzone" v-on:vdropzone-sending="sendingEvent" @vdropzone-complete="afterComplete"  id="dropzone" :options="dropzoneOptions"></vue-dropzone>

        <div class="row">
            <div class="col-md-6">
                <label for="text_checkbox">Додати текст і водяний знак</label>
                <input type="checkbox" v-model="ch1" name="text_checkbox" value="1">
                <hr>
                <input class="mb-2" v-if="this.ch1 == 1" type="text" v-model="text">
            </div>
        </div>


    </div>
</template>

<script>
    import vue2Dropzone from 'vue2-dropzone'
    import 'vue2-dropzone/dist/vue2Dropzone.min.css'
    export default {
        name: "Articles",
        components: {
            vueDropzone: vue2Dropzone
        },
        data: function () {
            return {
                dropzoneOptions: {
                    url: '/watermark',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                },
                text: '',
                ch1: false,
                watermark: false,
            }
        },
        methods:{
            afterComplete(req) {
                console.log(req);
            },
            sendingEvent (file, xhr, formData) {
                formData.append('text', this.text);
                formData.append('ch1', this.ch1);
                formData.append('watermark', this.watermark);
            }
        }
    }
</script>

<style scoped>

</style>
