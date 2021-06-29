<template>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Kategorisasi CPL Program Studi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                  <thead>
                    <tr>
                      <th>Code</th>
                      <th>Capaian Pembelajaran Lulusan</th>
                      <th>Unsur</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="detail in detailprofillulusan" :key="detail.id">

                      <td >{{detail.code}}</td>
                      <td >{{detail.detail}}</td>
                      <td>
                          <select name="unsur" v-model="detail.unsur" id="unsur"  v-bind:value="detail.unsur">
                            <option v-for="unsur in unsur_data" v-bind:key="unsur" v-bind:value="unsur">{{unsur}}</option>
                          </select>
                      </td>
                      <td>
                        <form @submit.prevent="updateDetailProfilulusan(detail)">
                        <div class="row">
                          <div class="col-12">
                            <input type="submit" value="Simpan" class="btn btn-success float-right">
                          </div>
                        </div>
                        </form>
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
      </div>
</template>

<script>
    const URL = "http://localhost:8000/";
    export default {
        data () {
            return {
                detailprofillulusan : [],
                cplprodi : [],
                  form:new Form({
                    unsur :''
                }),
                unsur_data : [
                  "Sikap",
                  "Pengetahuan",
                  "Ketrampilan umum",
                  "Keterampilan Khusus"
                ],
                updatedUnsur : []
            }
        },
       methods:{
         loadCplprodi(){
              axios.get(URL+'api/cplprodi').then(data => {
                  this.cplprodi = data.data.data;
                  console.log(data);
              });
         },
          loadDetailprofillulusan(){
              axios.get(URL+'api/detailprofillulusan').then(data => {
                  this.detailprofillulusan = data.data.data;

              });
          },
          createCplprodi(){

            this.form.put(URL+'api/cplprodi');
            $('#addNew')
            Swal.fire({
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500
              })
          },
        updateDetailProfilulusan(detail){
            this.form.unsur = detail.unsur;
            this.form.put(URL+'api/cplprodi/'+detail.id);
            $('#addNew').modal('hide');
            Fire.$emit('AfterCreated');
            this.form.reset();
            Swal.fire({
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500
              })
        }
        },
        created() {
            Fire.$on('AfterCreated', () => {
                this.loadCplprodi();
            })
            this.loadCplprodi();
            this.loadDetailprofillulusan();
        }
    }
</script>
