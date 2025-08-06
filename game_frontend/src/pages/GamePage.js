import React, { useEffect, useState } from "react";
import { useParams, Link } from "react-router-dom";
import { getGame } from "../api/api";

export default function GamePage() {
  const { slug } = useParams();
  const [game, setGame] = useState(null);

  useEffect(() => {
    getGame(slug).then(setGame);
  }, [slug]);

  if (!game) return <p>Loading...</p>;

  return (
    <div>
      <Link to="/">← Back</Link>
      <h1>{game.name}</h1>
      <img src={game.poster} alt={game.name} style={{ maxWidth: "300px" }} />
      <p>⭐ Rating: {game.rating}</p>
      <p>Release Date: {game.released}</p>
      <p>{game.description}</p>
    </div>
  );
}
