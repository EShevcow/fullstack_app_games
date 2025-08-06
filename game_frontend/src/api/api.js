//import React from "react";

const API_URL = "http://localhost/game_api/index.php";
const AUTH = "Basic " + btoa("admin:secret");

export async function getGames() {
 
  const res = await fetch(`${API_URL}/games`, 
  {
   headers: { "Authorization": AUTH }
  });
  if (!res.ok) throw new Error("Failed to fetch games");
  return res.json();
}

export async function getGame(slug) {
  const res = await fetch(`${API_URL}/game/${slug}`, {
    headers: { "Authorization": AUTH }
  });
  if (!res.ok) throw new Error("Failed to fetch game");
  return res.json();
}
