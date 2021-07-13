<template>
    <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Distribusi Mata Kuliah</h3>
              </div>
            </div>
            <!-- /.card -->
            <div class="col-md-6" data-select2-id="14">
              <div class="form-group" data-select2-id="13">
                <label>Pilih Semester :</label>
                <select name="smt"  placeholder="Semester" v-model="form.smt_id" id="smt" class="form-control" :class="{ 'is-invalid': form.errors.has('smt_id') }">
                        <option v-for="smt in pembentukanmatkul" :key="smt.id" v-bind:value="smt.id">{{ smt.pembentukanmatkul }}</option>
                </select>
              </div>
            </div>
          </div>
        </div>
         <div class="row">
            <div class="col-12">
               <a href="" @click.prevent="printCetakdata" class="btn btn-success float-right" target="_blank">Cetak Data</a>
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
                pembentukanmatkul : [],
                detailmatkul : [],
                distribusimatkul : [],
                form:new Form({
                    smt_id:'',
                    dtlmatkul_id:'',
                    jenismatkul:'',
                    sks_id:'',
                    jam_id:'',
                    totalsks:'',
                    totaljam:''
                })
            }
        },
        methods:{
           updateDistribusimatkul(){
                this.form.put(URL+'api/distribusimatkul'+this.form.id);
                    $('#addNew').modal('hide');
                     Swal.fire(
                        'Updated!',
                        'Information has been updated.',
                        'success'
                        )

                         Fire.$emit('AfterCreate');

            },
            editModal(distribusimatkul){
                this.editMode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(distribusimatkul);
            },
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },
          loadDetailmatkul(){
              axios.get(URL+'api/detailmatkul').then(data => {
                  this.detailmatkul = data.data;
                  
              });
          },
          loadPembentukanmatkul(){
              axios.get(URL+'api/pembentukanmatkul').then(data => {
                  this.kajian= data.data;
                  
              });
          },
          loadDistribusimatkul(){
              axios.get(URL+'api/distribusimatkul').then(data => {
                  this.distribusimatkul= data.data;
              axios.get(URL + 'api/distribusimatkul', {responseType: 'blob'}).then(response => {
                  const url = window.URL.createObjectURL(new Blob([response.data]));
                  const link = document.createElement('a');
                  link.href = url;
                  link.setAttribute('download', 'Kurikulum.pdf'); //or any other extension
                  document.body.appendChild(link);
                  link.click();
                })
                .catch(error => {
                    console.log(error);
                })
                  
              });
          },
          createDistribusimatkul(){
            this.form.post(URL+'api/distribusimatkul');
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
            this.loadPembentukanmatkul();
            this.loadDetailmatkul();
            this.loadDistribusimatkul();
        }
    }
</script>
