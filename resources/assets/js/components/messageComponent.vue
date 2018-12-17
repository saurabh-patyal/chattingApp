<template>
<div class="panel panel-default " >
                    <div class="panel-heading 
                    "><b :class="{'text-danger':session_block}">
                    	{{friend.name}}
                    	<span v-if="session_block">(Blocked)</span>
                    </b>
                    <!-- close button open -->
                    <a href="" @click.prevent="close(friend)">
                    	<i class="fa fa-times pull-right " aria-hidden="true "></i>
                    </a>
                    <!-- close button ends here -->

                    <!-- option button open -->
                    	<div class="dropdown mr-4 pull-right">
                    		<a href=""  class=" dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    	<i class="fa fa-ellipsis-v  " ></i></a>
                    	
  
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
  	<li v-if="session_block"><a href="#"  @click.prevent="unblock"> UnBlock</a></li>
    <li v-else><a href="#"  @click.prevent="block" >Block</a></li>
    
    <li><a href="#" @click.prevent="clear">clear chat</a></li>
   
  </ul>
  </div>


                    <!-- option button ends -->
                    </div>

                    <div class="panel-body chat-box" v-chat-scroll>
                        
                         <p class="panel-text" v-for="chat in chats":key="chat.message">{{chat.message}}</p>
                        
                    </div>
                        <form class="panel-footer"@submit.prevent="send">
                            <div class="form-group">
                                <input type="text" class="form-control " placeholder="Write your message here" :disabled="session_block">
                            </div>


                        </form>
                </div>


</template>	

<script>
    export default {
      props:['friend'],
    	data(){
    		return{
    			chats:[],
    			
    			session_block:false
    		}
    	},
       methods:{
       	send(){
       		console.log('sended message')
       	},
       	close(friend){
       		friend.session.open=false
       	},
       	clear(){
       		this.chats=[]
       	},
       	block(){
       			this.session_block=true
       	},
       	unblock(){
       			this.session_block=false
       	}
       },
       created(){
       	this.chats.push({message:'hey hi'},
       		
       		{message:'hey how r you'},
       		{message:'hey how r you'},
       		
       		{message:'bottom chat3'},
       		{message:'bottom chat3'},
       		{message:'bottom chat3'},
       		{message:'current message'},

       		)
       }
    }
</script>

<style>
.chat-box{
	height:300px;
}
.panel-body{
	overflow-y:scroll;
}
</style>