<template>
    <div class="container">
        <div class="row">
            <div class="col-md-3 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Friend List</div>

                    <div class="panel-body">
                        
                         <ul class="list-group">
                              <a href="" v-for="friend in friends" @click.prevent=""><li class="list-group-item" >{{friend.name}}</li>
                              </a>
                              
                            </ul>
                        
                    </div>
                </div>
            </div>
                 <div class="col-md-9">
                    <message-component></message-component>
                    </div>
        </div>
        
    </div>
</template>

<script>
    import messageComponent from './messageComponent';

    export default {
        components:{messageComponent},
        data(){
            return{
                friends:[]
            }
        },
    
    methods:{
        getFriends(){
            axios.post('/getFriends').then(res=>this.friends=res.data.data)
        }
    },
    created(){
        this.getFriends()
    },

}
</script>
