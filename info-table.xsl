<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:template match="/">
	   <table>
			<tr>
				<th></th>
				<th>Лицензия</th>
				<th>Сканирование по запросу</th>
				<th>Постоянная защита</th>
				<th>Email защита</th>
				<th>Веб-защита</th>
			</tr>
			<xsl:apply-templates select="//anti" />
	   </table>
	</xsl:template>

	<xsl:template match="anti">
		<xsl:variable name="src_license" select="license-img" />
		<xsl:variable name="src_logo" select="icon" />
		<tr>
			<td>
				<img src="{$src_logo}" alt="logo image" width="40mm" /><br />
				<xsl:value-of select="name" />
			</td>
			<td><img src="{$src_license}" alt="license image" width="70mm" /></td>
			<td><xsl:value-of select="scan" /></td>
			<td><xsl:value-of select="permanent" /></td>
			<td><xsl:value-of select="email" /></td>
			<td><xsl:value-of select="web" /></td>
		</tr>
	</xsl:template>

</xsl:stylesheet>
