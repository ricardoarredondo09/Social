<template>
<div @click="redirectIfGuest">
        <div class="card border-0 mb-3 shadow-sm" v-for="status in statuses">
            <div class="card-body d-flex flex-column">
                <div class="d-flex align-items-center mb-3">
                    <img width="40px" class="rounded float-left mr-3 shadow-sm" src="https://codahosted.io/docs/IZn3UNbEOU/blobs/bl-gn3EiJrUjd/31fe4b1bce7a206c58f7e89c75be122c1c38fb2c067ebe71b7d8ab98810ff5223c8cd31eaa69060a1d6945764e217b44561cb607140d4f3fc0412290eae8e9fdfb32d607144c0e5ddeb4ccacabc987df43d14b74f855a0842a7e14c195ecb29452a70664" alt="">
                    <div>
                        <h5 class="mb-1" v-text="status.user_name"></h5>
                        <div class="small text-muted" v-text="status.ago"></div>
                    </div>
                    
                </div>
                
                <p class="card-text text-secondary" v-text="status.body"></p>
            </div>
            <div class="card-footer p-2 d-flex justify-content-between align-items-center">
                <button class="btn btn-link btn-sm" v-if="status.is_liked" dusk="unlike-btn" @click="unlike(status)">
                    <strong>
                        <i class="fa fa-thumbs-up text-primary mr-1"></i>
                        TE GUSTA
                        </strong></button>
                <button class="btn btn-link btn-sm" v-else dusk="like-btn" @click="like(status)"> <i class="far fa-thumbs-up text-primary mr-1"></i>ME GUSTA</button>

                <div class="text-secondary mr-2">
                    <i class="far fa-thumbs-up"></i>
                    <span dusk="likes-count">{{status.likes_count}}</span>
                </div>
                
            </div>
        </div>
</div>

</template>
<script>

export default {

    data(){
        return {
            statuses: []
        }
    },

    mounted() {
        axios.get('/statuses')
            .then(res=>{
                this.statuses = res.data.data;
            }).catch(err =>{
                console.log(err.response.data);
            });
        EventBus.$on('status-created', status=>{
            this.statuses.unshift(status);
        })
    },
    methods: {
        like(status){
            axios.post(`/statuses/${status.id}/likes`)
                .then(res => {
                    status.is_liked = true;
                    status.likes_count++;
                })
        },
        unlike(status){
            axios.delete(`/statuses/${status.id}/likes`)
                .then(res => {
                    status.is_liked = false;
                    status.likes_count--;
                })
        }
    }
}
</script>
