 var app=new Vue(
     {
       el:'#invoice',
         data:{
           form:{},
             errors:{},
             isProcessing:false
         },
         created:function () {
           Vue.set(this.$data,'form',_form)
         },
          methods:{
           addline:function () {
               this.form.items.push({name:'',price:0,quantity:'1'})
           },
             remove:function (item) {
                 this.form.items.$remove(item);
             } ,
              create:function () {
                  this.$http.post('/invoices',this.form)
                      .then(function (response) {
                          if(response.data.created){
                              window.location='/invoices/'+response.data.id;
                          }
                          else {
                              this.isProcessing=false
                          }
                      })
                      .catch(function (response) {
                          Vue.set(this.$data,'errors',response.data);
                          this.isProcessing=false
                      })
              }
          },
         update :function () {
             this.$http.put('/invoices/'+this.form.id,this.form)
                 .then(function (response) {
                     if(response.data.created){
                         window.location='/invoices/'+response.data.id;
                     }
                     else {
                         this.isProcessing=false
                     }
                 })
                 .catch(function (response) {
                     Vue.set(this.$data,'errors',response.data);
                 })
         },
         computed:{
               sub_total:function () {
                   this.form.items.reduce(function (carry,item) {
                       return carry + (parseFloat(item.quantity)* parseFloat(item.price));
                   },0);
               },
         grand_total:function () {
             return this.sub_total - parseFloat(this.form.discount);
         }
     }
     })