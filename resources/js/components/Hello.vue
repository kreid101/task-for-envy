<template>
  <div class="wrapper">
    <div class="form">
      <input type="text" name="name" v-model="name" placeholder="Имя" />
      <input type="text" name="phone" v-model="phone" placeholder="Телефон" />
      <textarea
        type="text"
        name="message"
        v-model="message"
        placeholder="Сообщение"
      />
      <button @click="sendData()">Отправить</button>
    </div>
  </div>
  <div v-for="error in errors" :key="error">
    <div v-for="e in error" :key="e">
      <div class="error-block">
        {{ e }}
      </div>
    </div>
  </div>
  <div v-show="added" class="success-msg">Ваша заявка сохранена</div>
</template>


<script>
export default {
  data() {
    return {
      req: 0,
      name: "",
      phone: "",
      message: "",
      errors: {},
      added: false,
    };
  },
  methods: {
    sendData() {
      this.errors = {};
      this.added = false;
      let th = this;

      axios({
        method: "post",
        url: "/api/home",
        data: {
          name: this.name,
          phone: this.phone,
          message: this.message,
        },
      })
        .then(function (response) {
          if (response.status == 200) {
            th.added = true;
          }
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
    },
  },
};
</script>

<style scoped>
.form input {
  display: block;
  margin-bottom: 20px;
}
.form {
  border: 3px solid green;
  border-radius: 20px;
  width: min-content;
  padding: 30px;
  margin-bottom: 20px;
}
.error-block {
  background-color: rgb(226, 132, 132);
  width: 50vw;
  border: 1px solid black;
  margin-bottom: 10px;
  margin-left: 30%;
}
.success-msg {
  background-color: rgb(132, 226, 182);
  width: 50vw;
  border: 1px solid black;
  margin-bottom: 10px;
  margin-left: 30%;
}
.wrapper {
  display: grid;
  justify-content: center;
}
</style>