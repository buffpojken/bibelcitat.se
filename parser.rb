require 'json'
require 'iconv'
require 'cgi'


Dir.glob(File.join('data', '**')).each do |chapter|
	components = chapter.split("/")
	f = File.open(chapter, 'r:ISO-8859-1')
	a = f.readlines.map{|q| q.strip }
	verses = []
	stack = ""
	a.each do |line|
		if line.match(/^>/)
			stack += " "+line
		elsif line.match(/^[0-9]+\.\s+/)
			verses.push stack
			stack = ""
			stack += line
		else
			stack += " "+line
		end
	end
	f1 = File.open(File.join('results', components[-1].split(".")[0]+".json"), 'w:UTF-8')
	puts verses[0]
	f1.puts JSON.generate(verses)
	f.close
	f1.close         
end



# r = File.open('results/01_01.yml', 'r')
# verses = YAML::load(CGI::unescape(r.readlines.join("\n")))
# 
# puts verses[0]