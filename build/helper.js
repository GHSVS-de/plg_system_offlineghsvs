#!/usr/bin/env node

'use strict'

const fse = require('fs-extra');
const util = require("util");
const rimRaf = util.promisify(require("rimraf"));
const pc = require('picocolors');
const crypto = require('crypto');

module.exports.cleanOut = async (cleanOuts) =>
{
	for (const file of cleanOuts)
	{
		await rimRaf(file).then(
			answer => console.log(pc.red(pc.bold(`rimRafed "${file}".`)))
		).catch(error => console.error('Error ' + error));
	}
}

// Digest sha256, sha384 or sha512.
module.exports.getChecksum = async (path, Digest) =>
{
	if (!Digest)
	{
		Digest = 'sha256';
	}

  return new Promise(function (resolve, reject)
	{
    const hash = crypto.createHash(Digest);
    const input = fse.createReadStream(path);

    input.on('error', reject);
    input.on('data', function (chunk)
		{
      hash.update(chunk);
    });

    input.on('close', function ()
		{
      resolve(hash.digest('hex'));
    });
  });
}

// Find version string in file. E.g. 'scssphp/scssphp'
module.exports.findVersionSub = async (packagesFile, packageName) =>
{
	console.log(pc.magenta(pc.bold(
	`Search versionSub of package "${packageName}" in "${packagesFile}".`)));

	let foundVersion = '';
	const {packages} = require(packagesFile);

	await packages.forEach((Package) =>
	{
		if (Package.name === packageName)
		{
			foundVersion = Package.version_normalized;
			return false;
		}
	});

	return foundVersion;
}

// Simple. Find version string in file package.json
module.exports.findVersionSubSimple = async (packagesFile, packageName) =>
{
	console.log(pc.magenta(pc.bold(
	`Search versionSub of package "${packageName}" in "${packagesFile}".`)));

	return require(packagesFile).version;
}
