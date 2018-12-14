<template>
    <div class="container">
        <div class="row">
            <div class="col-md-3 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Private chat App</div>

                    <div class="panel-body">
                        
                         <ul class="list-group">
                              <li class="list-group-item">Cras justo odio</li>
                              <li class="list-group-item">saurabh</li>
                              
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
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
