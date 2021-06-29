<template>
    <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Detail Mata Kuliah</h3>

                <div class="card-tools">
                     <button class="btn btn-success" @click="newModal">Tambah <i class="fas fa-user-plus fa-fw"></i></button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                  <thead>
                    <tr role="row">
                      <th>Mata Kuliah</th>
                      <th>Detail Mata Kuliah</th>
                      <th>Modify</th>
                    </tr>
                  </thead>
                  <tbody>
                      <tr v-for="detailmatkul in detailmatkul" :key="detailmatkul.id">
                      <td>{{detailmatkul.kajian.matkul}}</td>
                      <td>{{detailmatkul.dtlmatkul}}</td>
                      <td>
                          <a href="#" @click="editModal(detailmatkul)">
                              <i class="fas fa-edit fa-fw"></i>
                          </a>

                          <a href="#" @click="deleteDetailmatkul(detailmatkul.id)">
                              <i class="fas fa-trash fa-fw"></i>
                          </a>
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
        <!-- Modal -->
        <div class="modal fade" id="addNew" tabindex="-1"  role="dialog"
        aria-labelledby="addNewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                 <h5 class="modal-title" v-show="!editMode" id="addNewLabel">Tambah Detail Mata Kuliah</h5>
                 <h5 class="modal-title" v-show="editMode" id="addNewLabel">Update Detail Mata Kuliah</h5>
                <button type="button" class="close" data-dismiss="modal"
                aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent="editMode ? updateDetailmatkul() : createDetailmatkul()">
            <div class="modal-body">

                 <div class="form-group">
                     <select name="matkul_id"  placeholder="Mata Kuliah" v-model="form.matkul_id" id="matkul" class="form-control" :class="{ 'is-invalid': form.errors.has('matkul_id') }">
                        <option v-for="matkul in kajian" :key="matkul.id" v-bind:value="matkul.id">{{ matkul.kajian }}</option>
                    </select>
                <has-error :form="form" field="matkul"></has-error>
                </div>

                <div class="form-group">
                <input v-model="form.dtlmatkul" type="text" name="dtlmatkul"
                    placeholder="Detail Matkul"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('dtlmatkul') }">
                <has-error :form="form" field="dtlmatkul"></has-error>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button v-show="editMode" type="submit" class="btn btn-success">Update</button>
                <button v-show="!editMode" type="submit" class="btn btn-primary">Create</button>
            </div>
            </form>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
    const URL = "http://localhost:8000/";
    export default {
        data () {
            return {
                editMode: false,
                kajian : [],
                detailmatkul : [],
                form:new Form({
                    matkul_id:'',
                    dtlmatkul:''
                })
            }
        },
        methods:{
           updateDetailmatkul(){
                this.form.put(URL+'api/matkul/all'+this.form.id);
                    $('#addNew').modal('hide');
                     Swal.fire(
                        'Updated!',
                        'Information has been updated.',
                        'success'
                        )

                         Fire.$emit('AfterCreate');

            },
            editModal(detailmatkul){
                this.editMode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(detailmatkul);
            },
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },
           deleteDetailmatkul(id){
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
                                this.form.delete(URL+'api/matkul/all/'+id).then(()=>{
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
          loadDetailmatkul(){
              axios.get(URL+'api/matkul/all').then(data => {
                  this.detailmatkul = data.data.data;
              });
          },
          loadKajian(){
              axios.get(URL+'api/kajian').then(data => {
                  this.kajian= data.data.data;
                  console.log(data);
              });
          },
          createDetailmatkul(){
            this.form.post(URL+'api/matkul/all');
            $('#addNew').modal('hide')
            Swal.fire({
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500
              })
              Fire.$emit('AfterCreate')
          }
        },
        created() {
            this.loadKajian();
            this.loadDetailmatkul();
        }
    }
</script>
