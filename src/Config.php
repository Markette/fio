<?php declare(strict_types = 1);

namespace Contributte\Fio;

use Contributte\Fio\Entity\Account\Account;
use Contributte\Fio\Exceptions\InvalidAccountException;

/**
 * Config
 *
 * @author Filip Suska <vody105@gmail.com>
 */
class Config
{

	/** @var Account[] */
	private $accounts;

	/**
	 * @param string $name
	 * @param Account $account
	 * @return void
	 */
	public function addAccount(string $name, Account $account): void
	{
		$this->accounts[$name] = $account;
	}

	/**
	 * @param string $name
	 * @return Account
	 * @throws InvalidAccountException when there is no account saved under called name
	 */
	public function getAccountByName(string $name): Account
	{
		if (!isset($this->accounts[$name])) {
			throw new InvalidAccountException(sprintf('There is no account saved under %s name.', $name));
		}

		return $this->accounts[$name];
	}

	/**
	 * @return Account[]
	 */
	public function getAccounts(): array
	{
		return $this->accounts;
	}

	/**
	 * @param Account[] $accounts
	 * @return void
	 */
	public function setAccounts(array $accounts): void
	{
		$this->accounts = $accounts;
	}

}
