FROM node:20-slim
WORKDIR /app
# COPY package*.json ./
RUN npm init -y
RUN npm install
# COPY . .
CMD ["npm", "run", "serve"]