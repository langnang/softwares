const express = require('express');
const app = express();
const PORT = 3000;

app.get('/', (req, res) => {
  res.send('Node.js 20 in Docker with Hot Reload!');
});

app.listen(PORT, () => {
  console.log(`Server running on http://localhost:${PORT}`);
});