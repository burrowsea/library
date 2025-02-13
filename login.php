<?php
session_start();

$valid_username = "admin";
$valid_password = "password"; 

if ($_POST['username'] === $valid_username && $_POST['password'] === $valid_password) {
    $_SESSION['admin_logged_in'] = true;
    header("Location: admin.php");
} else {
    echo "Invalid login credentials. <a href='index.php'>Try again</a>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Snake Game</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    canvas {
      background-color: #000;
      border: 2px solid #fff;
    }
  </style>
</head>
<body>
  <canvas id="gameCanvas" width="400" height="400"></canvas>

  <script>
    const canvas = document.getElementById("gameCanvas");
    const ctx = canvas.getContext("2d");

    const gridSize = 20;
    const canvasSize = 400;
    let snake = [{x: 160, y: 160}];
    let direction = "RIGHT";
    let food = {x: 200, y: 200};
    let gameOver = false;

    // Draw the snake
    function drawSnake() {
      snake.forEach(segment => {
        ctx.fillStyle = "green";
        ctx.fillRect(segment.x, segment.y, gridSize, gridSize);
      });
    }

    // Draw the food
    function drawFood() {
      ctx.fillStyle = "red";
      ctx.fillRect(food.x, food.y, gridSize, gridSize);
    }

    // Move the snake
    function moveSnake() {
      const head = { ...snake[0] };

      switch (direction) {
        case "UP": head.y -= gridSize; break;
        case "DOWN": head.y += gridSize; break;
        case "LEFT": head.x -= gridSize; break;
        case "RIGHT": head.x += gridSize; break;
      }

      snake.unshift(head);
      if (head.x === food.x && head.y === food.y) {
        food = generateFood();
      } else {
        snake.pop();
      }
    }

    // Generate random food
    function generateFood() {
      const foodX = Math.floor(Math.random() * (canvasSize / gridSize)) * gridSize;
      const foodY = Math.floor(Math.random() * (canvasSize / gridSize)) * gridSize;
      return { x: foodX, y: foodY };
    }

    // Check for collisions with walls or itself
    function checkCollisions() {
      const head = snake[0];

      if (head.x < 0 || head.x >= canvasSize || head.y < 0 || head.y >= canvasSize) {
        gameOver = true;
      }

      for (let i = 1; i < snake.length; i++) {
        if (head.x === snake[i].x && head.y === snake[i].y) {
          gameOver = true;
        }
      }
    }

    // Handle key press events
    function changeDirection(event) {
      if (event.key === "ArrowUp" && direction !== "DOWN") {
        direction = "UP";
      } else if (event.key === "ArrowDown" && direction !== "UP") {
        direction = "DOWN";
      } else if (event.key === "ArrowLeft" && direction !== "RIGHT") {
        direction = "LEFT";
      } else if (event.key === "ArrowRight" && direction !== "LEFT") {
        direction = "RIGHT";
      }
    }

    // Game loop
    function gameLoop() {
      if (gameOver) {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        ctx.fillStyle = "white";
        ctx.font = "30px Arial";
        ctx.fillText("Game Over!", 120, 200);
        return;
      }

      ctx.clearRect(0, 0, canvas.width, canvas.height);
      moveSnake();
      checkCollisions();
      drawSnake();
      drawFood();

      setTimeout(gameLoop, 100);
    }

    // Start the game
    window.addEventListener("keydown", changeDirection);
    gameLoop();
  </script>
</body>
</html>
