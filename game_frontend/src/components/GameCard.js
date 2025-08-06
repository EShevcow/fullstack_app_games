import React from "react";
import { Link } from "react-router-dom";

export default function GameCard({ game }) {
  return (
    <div className="game-card">
      <Link to={`/game/${game.slug}`}>
        <img src={game.poster} alt={game.name} />
        <h3>{game.name}</h3>
        <p>⭐ {game.rating}</p>
      </Link>
    </div>
  );
}
