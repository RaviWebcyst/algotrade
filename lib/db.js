const mysql  =  require('serverless-mysql');
const db = mysql({
//   config: {
//     // host: process.env.ENDPOINT,
//     // database: process.env.DATABASE,
//     // user: process.env.USERNAME,
//     // password: process.env.PASSWORD
//     host: "192.168.60.240",
//     database:"ludo_network",
//     user: "root",
//     password:""
//   }
config: {
    host: "127.0.0.1",
    database:"colors",
    user: "root",
    password: ""
  }
});
async function excuteQuery({ query,value }) {
  try {
    const results = await db.query(query,value);
    await db.end();
    return results;
  } catch (error) {
    console.log(error);
    return { error };
  }
}

module.exports = {excuteQuery};