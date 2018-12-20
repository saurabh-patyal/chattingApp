<template>
    <div class="container">
        <div class="row">
            <div class="col-md-3 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Friend List</div>

                    <div class="panel-body">
                        
                         <ul class="list-group">
                              
                                <li class="list-group-item" v-for="friend in friends" @click.prevent="openChat(friend)" ><a href="">{{friend.name}}
                                </a>
                                  <i class="fa fa-circle pull-right text-success" v-if="friend.online"></i>
                                </li>
                                
                              
                              
                            </ul>
                        
                    </div>
                </div>
            </div>
                 <div> 
                      <span  class="col-md-9" v-for="friend in friends"v-if="friend.session" >
                        <message-component 
                           v-if="friend.session.open"
                            :friend=friend
                        >
                            
                        </message-component>

                        </span>
                    
                    </div>
        </div>
        
    </div>
</template>

<script>
    import messageComponent from './messageComponent';

  export default {
  data() {
    return {
      friends: []
    };
  },
  methods: {
    close(friend) {
      friend.session.open = false;
    },
    getFriends() {
      axios.post("/getFriends").then(res => {
        this.friends = res.data.data;
        
      });
    },
    openChat(friend) {
      if (friend.session) {
        this.friends.forEach(friend=>{
          
        friend.session.open = false
    });

       friend.session.open = true
      } else {
        this.createSession(friend);
      }
        },
    
    createSession(friend) {
      axios.post("/session/create", { friend_id: friend.id }).then(res =>{(friend.session=res.data.data),(friend.session.open=true) 
      })
     }
  },

  created() {
    this.getFriends();
    Echo.channel("Chat").listen("SessionEvent", e => {
      let friend = this.friends.find(friend => friend.id == e.session_by);
      friend.session = e.session;
      //this.listenForEverySession(friend);
});

    Echo.join('Chat')
    .here((users) => {
        this.friends.forEach(friend=>{
          users.forEach(user=>{
            if(user.id==friend.id){
              friend.online=true
            }

          })
           
        })

    })
    .joining((user) => {
        this.friends.forEach(friend=>user.id==friend.id? friend.online=true: '')
      })
        .leaving((user) => {
        this.friends.forEach(friend=>user.id==friend.id? friend.online=false: '')
      })
    
  },
  components: { messageComponent }
};






</script>
