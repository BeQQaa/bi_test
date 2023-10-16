<script setup>
import { defineProps, ref  } from 'vue';

const props = defineProps({
  value: [String, Number],
  type: {
    type: String,
    default: "text"
  },
  required: {
    type: Boolean,
    default: false
  },
  placeholder: {
    type: String,
    default: "Enter value"
  }
});

const inputValue = ref(props.value);

// const { context } = defineEmits(['update:value']);

const updateInput = (event) => {
  inputValue.value = event.target.value;
//   context.emit('update:value', inputValue.value);
};

</script>

<template>
  <input
    v-model="inputValue"
    :value="inputValue"
    @input="updateInput"
    :type="type"
    :required="required"
    :placeholder="placeholder"
    class="input"
  />
</template>

<style>
.input {
    height: 55px;
    margin-top: 10px;
    width: 526px;
    flex-shrink: 0;
    background: #FFF;
    box-shadow: 0px 4px 2px 0px rgba(0, 0, 0, 0.25), 0px -4px 4px 0px rgba(0, 0, 0, 0.25);
    border: 0;
    padding: 20px;
}
</style>