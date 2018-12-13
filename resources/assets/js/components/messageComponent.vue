<template>
<div class="panel panel-default ">
                    <div class="panel-heading ">Message Window</div>

                    <div class="panel-body chat-box">
                        
                         <p class="panel-text" v-for="chat in chats":key="chat.message">{{chat.message}}</p>
                        
                    </div>
                        <form class="panel-footer"@submit.prevent="send">
                            <div class="form-group">
                                <input type="text" class="form-control " placeholder="Write your message here">
                            </div>


                        </form>
                </div>


</template>	

<script>
    export default {
    	data(){
    		return{
    			chats:[]
    		}
    	},
       methods:{
       	send(){
       		console.log('sended message')
       	}
       },
       created(){
       	this.chats.push({message:'hey hi'},
       		{message:'hey how r you'},
       		{message:'hey how r you'},
       		{message:'hey how r you'},
       		{message:'hey how r you'},
       		{message:'hey how r you'},
       		{message:'hey how r you'},
       		{message:'hey how r you'},
       		{message:'hey how r you'},
       		{message:'hey how r you'},
       		{message:'hey how r you'},
       		{message:'hey how r you'},
       		)
       }
    }
</script>

<style>
.chat-box{
	height:400px
}
</style>