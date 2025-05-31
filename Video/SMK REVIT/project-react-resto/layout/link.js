import axios from "axios";

const url = "http://localhost:8000/api/";
let token = "hmrfGAFa8M07zosRTybKV79L2nyAqpLFIswDk9fG";

export const link = axios.create({
  baseURL: url,
  headers: {
    api_token: token,
  },
});
