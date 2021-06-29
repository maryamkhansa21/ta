<template>
    <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Kesepadanan Keterampilan Umum SN Dikti dengan Program Studi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                  <thead>
                    <tr role="row">
                      <th>Keterampilan Umum SN Dikti</th>
                      <th>Keterampilan Umum Prodi</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                      <tr v-for="kesepadananku in kesepadananku" :key="kesepadananku.id">
                      <td>{{kesepadananku.dashboard.kudikti}}</td>
                       <td>
                          <multiselect style="z-index : 2;position : relative;" v-model="kesepadananku.detailprofillulusan" placeholder="Pilih KU Prodi" label="detail" track-by="id" :options="detailprofillulusan" :multiple="true" @input="updateDprofillulusan"></multiselect>
                      </td>
                      <td>
                           <form @submit.prevent="updateDashboard(kuprodi)">
                        <div class="row">
                          <div class="col-12">
                            <input type="submit" value="Simpan" class="btn btn-success float-right">
                          </div>
                        </div>
                        </form>
                      </td>
                    </tr>
                    <tr>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
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
                dashboard : [],
                kesepadananku : [],
                form:new Form({
                    kuprodi:''
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
           updateKesepadananku(){
                this.form.details = this.detailsById;
                this.form.put(URL+'api/kesepadananku'+this.form.id);
                    $('#addNew').modal('hide');
                     Swal.fire(
                        'Updated!',
                        'Information has been updated.',
                        'success'
                        )
                     
                         Fire.$emit('AfterCreate');
                
            },
            editModal(kesepadananku){
                this.editMode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(kesepadananku);
            },
            newModal(){
                this.detailsById = [];
                this.editmode = false;
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
                                    Fire.$emit('AfterCreate');
                                }).catch(()=> {
                                    swal("Failed!", "There was something wronge.", "warning");
                                });
                         }
                    })
            },
          loadKesepadananku(){
              axios.get(URL+'api/kesepadananku').then(data => {
                  this.kesepadananku = data.data.data;
              });
          },
          loadDetailprofillulusan(){
              axios.get(URL+'api/detailprofillulusan').then(data => {
                  this.detailprofillulusan = data.data.data;
              });
          },
          createKesepadananku(){
            this.form.details = this.detailsById;
            this.form.post(URL+'api/kesepadananku');

              this.detailsById = [];
              this.detailsById = [];
            this.form.post(URL+'api/kesepadananku');
            $('#addNew').modal('hide')
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
        }
    }
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

