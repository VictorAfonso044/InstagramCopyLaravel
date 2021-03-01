<template>
    <div>
        <button @click="followUser" class="btn btn-primary ml-4" v-text="buttonText">Follow</button>
    </div>
</template>

<script>
    export default {
        props: ['userId', 'follows'],
        mounted() {
            console.log('Component mounted.')
        },
        data: function(){
            return {
                status: this.follows,
            }
        },
        methods:{
            followUser(){
                axios.post('/follow/' + this.userId)
                .then(response => {
                    this.status = !this.status;
                })
                .catch(errrors =>{
                    console.log(errrors);
                    if(errrors.response.status == 401){
                        window.location = '/login';
                    }
                });
            }
        },
        computed:{
            buttonText(){
                return (this.status) ? 'Unfollow' : 'Follow';
            }
        }
    }
</script>
