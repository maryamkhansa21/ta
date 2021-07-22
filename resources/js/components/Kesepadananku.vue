<template>
      <div class="container">
          <div class="row mb-2 mt-2">
          </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Kesepadanan Keterampilan Umum</h3>
              </div>
              <!-- /.card-body -->
            </div>
            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                  <thead>
                  <tr>
                      <th>Keterampilan Umum SN DIKTI</th>
                      <th>Keterampilan Umum Program Studi</th>
                      <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr v-for="(kesepadananku, index) in kesepadananku.data" :key="kesepadananku.id">
                      <td>{{kesepadananku.kudikti}}</td>
                      <td>
                          <multiselect v-model="kesepadananku.detailprofillulusan" placeholder="Pilih Capaian Profil Lulusan" label="code" track-by="id" :options="detailprofillulusan" :multiple="true" @input="updateDetail"></multiselect>
                      </td>
                      <td>
                          <button type="button" class="btn btn-success float-right" @click="updateKesepadananku(kesepadananku)">Simpan</button>
                      </td>
                  </tr>
                  </tbody>
              </table>

              <!-- /.card -->
          </div>
        </div>
      </div>
</template>

<script>
    const URL = "http://localhost:8000/";
    import Multiselect from 'vue-multiselect';
    export default {
        components: {
            Multiselect
        },
        data () {
            return {
                editMode: false,
                detailprofillulusan : [],
                kesepadananku : [],
                  form:new Form({
                    details :[],
                    kudikti :''
                }),
                detailsById : [],
            }
        },
       methods:{
           updateDetail(details) {
               let detailsById = [];

               details.forEach((detail) => {
                   detailsById.push(detail.id);
               });

               this.detailsById = detailsById;
           },
            updateKesepadananku(kesepadananku){
                if(this.detailsById.length==0){
                    kesepadananku.detailprofillulusan.forEach(data=>{
                        this.detailsById.push(data.id)
                    })
                } 
                this.form.kudikti = kesepadananku.kudikti;
                this.form.details = this.detailsById;
                this.form.put(URL+'api/kesepadananku/'+kesepadananku.id);
                    $('#addNew').modal('hide');
                     Swal.fire(
                        'Updated!',
                        'Information has been updated.',
                        'success'
                        )
                Fire.$emit('AfterCreated');
                this.details = [];
                this.form.reset();

            },
            editModal(kesepadananku){
                this.editMode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(kesepadananku);
            },
            newModal(){
                this.detailsById = [];
                this.form.reset();
                $('#addNew').modal('show');
            },
           deleteKesepadananku(id){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        // Send request to the server
                         if (result.value) {
                                this.form.delete(URL+'api/kesepadananku/'+id).then(()=>{
                                        Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                        )
                                    Fire.$emit('AfterCreated');
                                }).catch(()=> {
                                    swal("Failed!", "There was something wronge.", "warning");
                                });
                         }
                    })
            },
         loadKesepadananku(){
            axios.get(URL+'api/kesepadananku').then(data => {
                  this.kesepadananku = data.data;
                  console.log(data);
              });
         },
          loadDetailprofillulusan(){
              axios.get(URL+'api/detailprofillulusan').then(data => {
                  this.detailprofillulusan = data.data;
              });
          },
          createKesepadananku(){
            this.form.details = this.detailsById;
            this.form.post(URL+'api/kesepadananku');

              this.detailsById = [];
            $('#addNew').modal('hide');
            Fire.$emit('AfterCreated');
            Swal.fire({
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500
              })
          }
        },
        created() {
            this.loadKesepadananku();
            this.loadDetailprofillulusan();
            Fire.$on('AfterCreated', () => {
                this.loadKesepadananku();
            })
        }
    }
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style scoped>
.card {
    background-color: rgba(255, 255, 255, 1);
}
</style>


