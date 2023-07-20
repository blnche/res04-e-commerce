<?php
class Order
{
	private ?int $id;
	private string $status;
	private $date;
	private int $user_id;
	private int $quantity;
	private int $amount;
	public function __construct(string $status, DateTime $date, int $user_id, int $quantity, int $amount)
	{
		$this->status = $status;
		$this->date = $date;
		$this->user_id = $user_id;
		$this->quantity = $quantity;
		$this->amount = $amount;
	}

	public function getId()
	{
		return $this->id;
	}
	public function getStatus()
	{
		return $this->status;
	}
	public function getDate()
	{
		return $this->date;
	}
	public function getUserId()
	{
		return $this->user_id;
	}
	public function getQuantity()
	{
		return $this->quantity;
	}
	public function getAmount()
	{
		return $this->amount;
	}


	public function setId($id)
	{
		$this->id = $id;
	}
	public function setStatus($status)
	{
		$this->status = $status;
	}
	public function setDate($date)
	{
		$this->date = $date;
	}
	public function setUserId($user_id)
	{
		$this->user_id = $user_id;
	}
	public function setQuantity($quantity)
	{
		$this->quantity = $quantity;
	}
	public function setAmount($amount)
	{
		$this->amount = $amount;
	}
}
