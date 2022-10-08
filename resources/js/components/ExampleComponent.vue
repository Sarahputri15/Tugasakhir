<template>
     <div class="container">
         <div class="row">
             <div class="col-md-8 col-md-offset-2">
                 <div class="panel panel-default">
                     <div class="panel-heading">Example Push Notification </div>

                     <div class="panel-body">
                         <ul class="list-group">
                             
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </template>

 <script>
    export default {
        data: function(){
            return {
                notification: []
            }
        },
        mounted() {
            var x = this;
            Echo.channel('message')
            .listen('OrderStatusUpdated', (e) => {
                console.log(e.message.replace('{username}', e.username));

                this.notification.push(e.message.replace('{username}', e.username))
            });
        }
    }
 </script>
