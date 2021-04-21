<template>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Kajian dan Penetapan Mata Kuliah</h3>
                <div class="card-tools">
                     <button class="btn btn-success" @click="newModal">Tambah <i class="fas fa-user-plus fa-fw"></i></button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                  <thead>
                    <tr>
                      <th>CPL</th>
                      <th>Bahan Kajian</th>
                      <th>Mata Kuliah</th>
                      <th>Modify</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="k in kajian" :key="k.id">
                      <td>{{k.detailprofillulusan.detail}}</td>
                      <td>{{k.bahankajian.bahankajian}}</td>
                      <td>{{k.matkul}}  
                        <td>
                          <a href="#" @click="editModal(c)">
                              <i class="fas fa-edit fa-fw"></i>
                          </a>
                          
                          <a href="#" @click="deleteKajian(c.id)">
                              <i class="fas fa-trash fa-fw"></i>
                          </a>
                      </td>    
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
                 <h5 class="modal-title" v-show="!editMode" id="addNewLabel">Tambah Mata Kulian</h5>
                 <h5 class="modal-title" v-show="editMode" id="addNewLabel">Update Mata Kuliah</h5>
                <button type="button" class="close" data-dismiss="modal"
                aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent="editMode ? updateKajian() : createKajian()">
            <div class="modal-body">
               <div class="form-group">
                     <select name="detail_id" v-model="form.detail_id" id="detail" class="form-control" :class="{ 'is-invalid': form.errors.has('detail_id') }">
                        <option v-for="detail in detailprofillulusan" :key="detail.id" v-bind:value="detail.id">{{ detail.detailprofillulusan }}</option>
                    </select>
                <has-error :form="form" field="detail"></has-error>
                </div>

               <div class="form-group">
                     <select name="bahankajian_id" v-model="form.bahankajian_id" id="bahankajian" class="form-control" :class="{ 'is-invalid': form.errors.has('bahankajian_id') }">
                        <option v-for="bahankajian in bahankajian" :key="bahankajian.id" v-bind:value="bahankajian.id">{{ bahankajian.bahankajian }}</option>
                    </select>
                <has-error :form="form" field="bahankajian"></has-error>
                </div>
            
            <div class="form-group">
                <input v-model="form.matkul" type="text" name="matkul"
                    placeholder="Mata Kuliah"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('matkul') }">
                <has-error :form="form" field="matkul"></has-error>
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
                detailprofillulusan : [],
                bahankajian : [],
                  form:new Form({
                    detail_id :'',
                    bahankajian_id :'',
                    matkul :''
                })
            }
        },
       methods:{
         updateKajian(){
                this.form.put(URL+'api/kajian'+this.form.id);
                    $('#addNew').modal('hide');
                     Swal.fire(
                        'Updated!',
                        'Information has been updated.',
                        'success'
                        )
                     
                         Fire.$emit('AfterCreate');
                
            },
            editModal(kajian){
                this.editMode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(kajian);
            },
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },
           deleteKajian(id){
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
                                this.form.delete(URL+'api/kajian/'+id).then(()=>{
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
         loadKajian(){
              axios.get(URL+'api/kajian').then(data => {
                  this.kajian = data.data.data;
                  console.log(data);
              });
         },
          loadDetailprofillulusan(){
              axios.get(URL+'api/detailprofillulusan').then(data => {
                  this.detailprofillulusan = data.data.data;
              });
          },
          loadBahankajian(){
              axios.get(URL+'api/bahankajian').then(data => {
                  this.bahankajian = data.data.data;
              });
          },
          createKajian(){
            this.form.post(URL+'api/kajian');
            $('#addNew')
            Swal.fire({
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500
              })
          }
        },
        created() {
            this.loadKajian();
            this.loadDetailprofillulusan();
            this.loadBahankajian();
        }
    }
</script>

