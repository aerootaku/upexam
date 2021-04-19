<template>
  <div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-primary">
            <div class="card-title">
              <div style="float: left">
                Customer List
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="card-content">
              <vs-table
                  v-model="selected"
                  pagination
                  max-items="10"
                  search
                  stripe
                  :data="table">
                <template slot="header">
                  <div class="d-flex align-items-center justify-content-between w-100 add-account">
                    <div class="float-right">
                      <vs-button class="mr-1" color="primary" data-placement="top" data-toggle="tooltip"
                                 title="Create Record" @click="create = true"
                                 vs-type="border" size="small">Create Record</vs-button>
                    </div>
                  </div>
                </template>

                <template slot="thead">
                  <vs-th sort-key="description">
                    Customer Name
                  </vs-th>
                  <vs-th sort-key="description">
                    Email
                  </vs-th>
                  <vs-th sort-key="description">
                    Contact Number
                  </vs-th>
                  <vs-th sort-key="description">
                    Gender
                  </vs-th>
                  <vs-th sort-key="description">
                    Birthdate
                  </vs-th>
                  <vs-th sort-key="description">
                    Address
                  </vs-th>
                  <vs-th sort-key="description">
                    Action
                  </vs-th>
                </template>

                <template slot-scope="{data}" ref="table-body" class="table-hover">
                  <vs-tr :data="row" :key="indextr" v-for="(row, indextr) in data" >
                    <vs-td>
                      {{ data[indextr].firstname }} {{ data[indextr].lastname }}

                    </vs-td>
                    <vs-td :data="data[indextr].email">
                      {{ data[indextr].email }}
                    </vs-td>
                    <vs-td :data="data[indextr].contact">
                      {{ data[indextr].contact }}
                    </vs-td>
                    <vs-td :data="data[indextr].gender">
                      {{ data[indextr].gender }}
                    </vs-td>
                    <vs-td :data="data[indextr].birthdate">
                      {{ data[indextr].birthdate }}
                    </vs-td>
                    <vs-td :data="data[indextr].address">
                      {{ data[indextr].address }}, {{ data[indextr].zip_code }}
                    </vs-td>
                    <vs-td>
                      <vs-button class="mr-1" color="primary" data-placement="top" data-toggle="tooltip"
                                 title="Edit Record" @click="edit = true"
                                 vs-type="border" size="small" icon="edit"/>


                    </vs-td>
                  </vs-tr>
                </template>
              </vs-table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <template>
      <vs-popup title="Edit Record" :active.sync="edit">
        <div>
          <form id="update-user" @submit.prevent="update">
            <div class="form-group">
              <label>Points</label>
              <input type="text" class="form-control" v-model="selected.points" required />
            </div>
            <div class="form-group">
              <label>Balance</label>
              <input type="text" class="form-control" v-model="selected.balance" required />
            </div>
            <div class="form-group">
              <label>Activation Points</label>
              <input type="text" class="form-control" v-model="selected.activation_points" required />
            </div>
            <div class="form-group">
              <label>Load Credits</label>
              <input type="text" class="form-control" v-model="selected.load_credits" required />
            </div>
            <div class="form-group float-right">
              <button class="btn btn-success" type="submit">Save Changes</button>
            </div>
          </form>
        </div>
      </vs-popup>
    </template>
    <template>
      <vs-popup title="Create Record" :active.sync="create">
        <div>
          <form id="create-customer" @submit.prevent="store">
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" required v-model="form['username']" />
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" required v-model="form['password']" />
            </div>
            <div class="form-group">
              <label>First Name</label>
              <input type="text" class="form-control" required v-model="form['firstname']" />
            </div>
            <div class="form-group">
              <label>Middle Name</label>
              <input type="text" class="form-control" v-model="form['middlename']" />
            </div>
            <div class="form-group">
              <label>Last Name</label>
              <input type="text" class="form-control" required v-model="form['lastname']" />
            </div>
            <div class="form-group">
              <label>Birth Date</label>
              <input type="date" class="form-control" required v-model="form['birthdate']" />
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" required v-model="form['email']" />
            </div>
            <div class="form-group">
              <label>Complete Address</label>
              <textarea class="form-control" required></textarea>
            </div>
            <div class="form-group">
              <label>Zip-code</label>
              <input type="number" class="form-control" required v-model="form['zip_code']" />
            </div>

            <div class="form-group float-right">
              <button class="btn btn-success" type="submit">Save Changes</button>
            </div>
          </form>
        </div>
      </vs-popup>
    </template>


  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: "member-override",


  data() {
    return {
      edit: false,
      remove: false,
      create: false,
      selected: [],
      form: {},
      table : []
    }
  },

  mounted() {
    this.fetchMembers();
  },

  methods: {
    fetchMembers() {

      axios.get('actions.php?getCustomers')
          .then(response => {
            this.table = response.data;
          })
          .catch(error => console.log(error));
    },

    store(){
      this.form['create'] = ''
      axios.post('actions.php', this.form)
          .then(response => {

            this.$vs.notify({
              'text' : response.data.message,
              'color' : response.data.type,
              'position' : 'top-right'
            });

            this.fetchMembers();

            // this.create = false;
            // this.form = {};

          }).catch(error => console.log(error));
    },

    update() {

      axios.patch('/api/updateMember/'+this.selected.id, this.selected)
          .then(response => {
            this.$vs.notify({
              'text' : response.data.message,
              'color' : response.data.type,
              'position' : 'top-right'
            });

            this.edit = false;
            this.fetchMembers();
          })
          .catch(error => console.log(error))
    },
  }
}
</script>

<style scoped>

</style>
